import http from 'k6/http';
import { check, sleep } from 'k6';

const base_url = 'https://'
var params = { headers: { 'Content-Type': 'application/json'}}
var pedido ;

var roadmap = 3; //1-admin,2-plataforma,3-utilização
var item_id = '';
var hash_code;
var check_hash;

export const options = {
  vus:  10,
  // iterations: 100, 
  duration: '7m', 
};

const POST = (route,payload) => {
  return http.post(`${base_url}${route}`, payload, params)
}

const GET = (route) => {
  return http.get(`${base_url}${route}`, params)
}

export default function () {
  switch (roadmap) {
    case 1: //fluxo admin
      login()
      me()
      get_produtos()
      store_pedido()
      get_pedido()
      get_preview_url()
      check_url()
      break;

    case 2: //fluxo plataforma
      params.headers[''] = ""
      get_produtos()
      store_pedido()
      get_pedido()
      get_preview_url()
      check_url()
      break;

    case 3: //fluxo utilização
      check_url_harded_code()
      break;
  
    default:
      throw('Error')
  }
}

function login(){
  sleep(random())
  const payload = JSON.stringify({email: '', password: ''});
  const res = POST('login', payload);
  params.headers['Authorization'] = `Bearer ${res.json().access_token}` 
  check(res, { 'login': (r) => r.status == 200 });
} 

function me(){
  const res = GET(`usuario/me`);
  console.log('-------------User Name----------')
  console.log(res.json().name)
  check(res, { 'me': (r) => r.status == 200 });
} 

function get_produtos(){
  const res = GET(`produto`);
  check(res, { 'produtos': (r) => r.status == 200 });
} 

function store_pedido(){
  const payload = JSON.stringify({"variacoes":[{"variacao_id":2,"quantidade":1}],"custom_data":"1","customer":"1","customer_id":"1", "postback_url":"https://devs.yetzcards.com.br/api/estoque/pedido/update","job":"job","expiration_control":1,"link_used_open_after_expires_at":1});
  const res = POST('pedido', payload);

  pedido = res.json().pedido
  
  check(res, { 'store_pedido': (r) => r.status == 200 && pedido.status === 'PROCESSANDO'});
} 

function get_pedido(){  
  sleep(4) 

  while (item_id.length === 0){
    var res = GET(`pedido/${pedido.id}`);  
    var pedido_api = res.json()

    var itens = pedido_api.itens

    if(itens.length > 0){
      item_id = itens[0].id
      hash_code = itens[0].hash_code
    }else{
      sleep(1)
    } 
  } 

  console.log('---------------------------------------------------------------------------------')
  console.log(pedido_api.id,pedido_api.status)

  check(res, { 'get_pedido': (r) => r.status == 200 && ['AGUARDANDO','GERADO'].includes(pedido_api.status)} );
} 

function get_preview_url(){
  const payload = JSON.stringify({"pedido_item_id":item_id,"hash_code":hash_code});
  const res = POST('pedido/preview-url', payload);

  var response = res.json() 
  var link = response.link;

  check_hash = link.substring(19)

  console.log('---------------------------------------------------------------------------------')
  console.log(link)

  check(res, { 'get_preview_url': (r) => r.status == 200 && response.success });
}  

function check_url(){
  const payload = JSON.stringify({"hash_code":check_hash});
  const res = POST('pedido/check-url', payload);

  var response = res.json() 

  console.log('---------------------------------------------------------------------------------')
  console.log(response.codes[0])

  check(res, { 'check_url': (r) => r.status == 200 && response.success });
} 

function check_url_harded_code(){
  const hashs = [
    'HxLqTR4LKcf3pcH.32476',
    'LP5XMQgXAuvV4Yw.32474',
    'zQf6Zn9l1tnondx.32473',
    'PJBITBRLoFKqukT.32472',
    '88PXxkqfhk8r38O.32471',
    'qzFd5u4TNVBZfIZ.32470',
    'd99ijZtFwBqgtPN.32468',
    'ngJzTLXU869HIAk.32466',
    'Sv8N975qOkIZGiR.32465',
    'uzcWhvWno8wN6R6.32463',
    'LUtjD8fNCprJWxD.32462',
    'CGSbPtBFrdysaOO.32461',
    '2b8Ed5KRZcAYrHb.32459',
    'fEp1LT9SmT2etxs.32457',
    'EPE7985zebL1PQv.32456',
    'iZ2rPoIPfjhGwu4.32449',
    'LgkdIRfg5ygaZVz.32451',
    'KLfFZ3zav7zLJDQ.32450',
    'wsRQcqdxR0UpEs9.32447',
    'Nm99B9dAu0pGUm4.32448',
  ]
  // sleep(random())
  var hash = hashs[random(20)]
  const payload = JSON.stringify({"hash_code":hash});
  const res = POST('pedido/check-url', payload);

  var response = res.json() 

  console.log('---------------------------------------------------------------------------------')
  console.log(hash,response.codes[0])

  check(res, { 'check_url': (r) => r.status == 200 && response.success });
} 

function random(limit = 6){
  const value = Math.random() * (limit - 1) + 1;
  return Math.floor(value)
}
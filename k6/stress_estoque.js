import http from 'k6/http';
import { check, sleep } from 'k6';

const base_url = 'https://sandbox.yetz.app/api/'
var params = { headers: { 'Content-Type': 'application/json'}}
var pedido ;

var item_id ;
var hash_code ;
// var check_link;

export const options = {
  vus: 1,
  iterations: 1, 
};

const POST = (route,payload) => {
  return http.post(`${base_url}${route}`, payload, params)
}

const GET = (route) => {
  return http.get(`${base_url}${route}`, params)
}

export default function () {
  login()
  me()
  get_produtos()
  store_pedido()
  get_pedido()
  get_preview_url()
}

function login(){
  const payload = JSON.stringify({email: 'master@cryptos.eti.br', password: '123456'});
  const res = POST('login', payload);
  params.headers['Authorization'] = `Bearer ${res.json().access_token}` 
  check(res, { 'login': (r) => r.status == 200 });
} 

function me(){
  const res = GET(`usuario/me`);
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
  sleep(3)
  const res = GET(`pedido/${pedido.id}`);  
  var pedido_api = res.json()

  var itens = pedido_api.itens

  item_id = itens[0].id
  hash_code = itens[0].hash_code

  console.log('---------------------------------------------------------------------------------')
  console.log(pedido_api.id,pedido_api.status)
  console.log('---------------------------------------------------------------------------------')

  check(res, { 'get_pedido': (r) => r.status == 200 && ['AGUARDANDO','GERADO'].includes(pedido_api.status)} );
} 

function get_preview_url(){
  const payload = JSON.stringify({"pedido_item_id":item_id,"hash_code":hash_code});
  const res = POST('pedido/preview-url', payload);

  var response = res.json() 

  let link = response.link;
  // link.toString();
  // var lc = link.toString()
  // let aaaa = lc.splice(".")

  console.log('---------------------------------------------------------------------------------')
  console.log(link.toString().splice("."))
  console.log('---------------------------------------------------------------------------------')


  console.log('---------------------------------------------------------------------------------')
  console.log('as')
  console.log('---------------------------------------------------------------------------------')

  check(res, { 'get_preview_url': (r) => r.status == 200 && response.success });
} 

function get_preview_url(){
  const payload = JSON.stringify({"pedido_item_id":item_id,"hash_code":hash_code});
  const res = POST('pedido/preview-url', payload);

  var response = res.json() 

  let link = response.link;
  // link.toString();
  // var lc = link.toString()
  // let aaaa = lc.splice(".")

  console.log('---------------------------------------------------------------------------------')
  console.log(link.toString().splice("."))
  console.log('---------------------------------------------------------------------------------')


  console.log('---------------------------------------------------------------------------------')
  console.log('as')
  console.log('---------------------------------------------------------------------------------')

  check(res, { 'get_preview_url': (r) => r.status == 200 && response.success });
} 

function check_url(){
  const payload = JSON.stringify({"hash_code":"X.X"});
  const res = POST('pedido/check-url', payload);

  var response = res.json() 

  check(res, { 'check_url': (r) => r.status == 200 && response.success });
} 



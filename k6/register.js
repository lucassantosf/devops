import http from 'k6/http';
import { check, sleep } from 'k6';

const base_url = 'https://sandbox.yetzpay.com.br/api/'
var params = { headers: { 'Content-Type': 'application/json'}}
var document = generate_document()
var campanha = 'yetztech'
var account  = '152417301'

var campanha_id;
var cartao_id;

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
  // check_campanha()
  // check_document()
  // check_account()
  // validate_cpf()
  // consult_cnpj()  
  register()
  // login()
  // me()
  // cartoes()
  // extrato()
}

function check_campanha(){
  const payload = JSON.stringify({campanha});
  const res = POST('check-campanha',payload);
  check(res, { 'campanha': (r) => r.status == 200 });
  sleep(random())
}

function check_document(){
  const payload = JSON.stringify({document,campanha});
  const res = POST('check-document', payload);
  check(res, { 'document': (r) => r.status == 200 });
  sleep(random())
} 

function check_account(){
  const payload = JSON.stringify({document,campanha,account});
  const res = POST('check-account-campanha', payload);
  check(res, { 'account': (r) => r.status == 200 });
  sleep(random())
}

function validate_cpf(){
  const payload = JSON.stringify({"document":"225","nome_da_mae":generate_name(),"nome_cpf":generate_name(),"data_nascimento":"1982-04-26"});
  const res = POST('validate-documents', payload);
  check(res, { 'validate_cpf': (r) => r.status == 200 });
  sleep(random())
}

function consult_cnpj(){
  const payload = JSON.stringify({document: '4382'});
  const res = POST('consult-documents', payload);
  check(res, { 'consult-documents': (r) => r.status == 200 });
  sleep(random())
}

function register(){
  const data = {
    "tipo":"fisica",
    "document":document,
    "campanha":campanha,
    "name":generate_name(), 
    "nome_cpf":generate_name(),
    "nome_da_mae":generate_name(),
    "apelido":generate_name(),
    "genero":"MASCULINO",
    "data_nascimento":"1990-01-31",
    "phone_number":generate_phone(),  
    "email":generate_email(),  
    "password":"12345678",
    "password_confirmation":"12345678",
    "cep":"18078600",
    "nome":"Rua Juvencio das Flores",
    "numero":"50",
    "complemento":"",
    "bairro":"Jardim das Flores",
    "cidade":"Sorocaba",
    "estado":"SP",
    "sms_service":1,
    "aceita_sms":1,
    "aceita_whats":1,
    "aceita_email":1,
    "aceita_termos":1,
    "aceita_politicamente_exposta":1
  }
  const payload = JSON.stringify(data);
  const res = POST('register', payload);
  check(res, { 'register': (r) => r.status == 200 });
  sleep(random())
} 

function login(){
  const payload = JSON.stringify({document, password: '123456'});
  const res = POST('login', payload);
  params.headers['Authorization'] = `Bearer ${res.json().access_token}` 
  campanha_id = res.json().campanhas[0].id
  check(res, { 'login': (r) => r.status == 200 });
  sleep(random())
} 

function me(){
  const res = GET(`usuario/me?campanhas[0]=${campanha_id}`);
  check(res, { 'me': (r) => r.status == 200 });
} 

function cartoes(){
  const res = GET(`cartao?campanhas[0]=${campanha_id}`);
  cartao_id = res.json()[2].id
  check(res, { 'cartoes': (r) => r.status == 200 });
} 

function extrato(){
  var date = new Date();
  var firstDay = first_day_month(date)
  var lastDay = last_day_month(date)

  const res = GET(`extrato/${cartao_id}?start=${firstDay}&end=${lastDay}`);
  check(res, { 'extrato': (r) => r.status == 200 });
} 

function random(){
  const value = Math.random() * (6 - 1) + 1;
  return Math.floor(value)
}

function first_day_month(date){
  var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
  return firstDay.toISOString().split('T')[0]
}

function last_day_month(date){
  var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
  return lastDay.toISOString().split('T')[0]
}

function generate_document(){
  var chars = '1234567890';
  var string = '';
  for(var ii=0; ii<11; ii++){
      string += chars[Math.floor(Math.random() * chars.length)];
  }
  return string
}

function generate_name(){
  var chars = 'abcdefghijklmnopqrstuvwxyz';
  var name = '';
  for(var ii=0; ii<7; ii++){
    name += chars[Math.floor(Math.random() * chars.length)];
  }

  var last_name = '';
  for(var ii=0; ii<7; ii++){
    last_name += chars[Math.floor(Math.random() * chars.length)];
  }
  return `${name} ${last_name}`
}

function generate_email(){
  var chars = 'abcdefghijklmnopqrstuvwxyz1234567890';
  var string = '';
  for(var ii=0; ii<15; ii++){
    string += chars[Math.floor(Math.random() * chars.length)];
  }
  return `${string}@gmail.com`
}

function generate_phone(){
  var chars = '0123456789';
  var string = '';
  for(var ii=0; ii<8; ii++){
      string += chars[Math.floor(Math.random() * chars.length)];
  }
  return `55159${string}`
} 
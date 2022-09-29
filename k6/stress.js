import http from 'k6/http';
import { check, sleep } from 'k6';

const base_url = 'https://yetzpay.com.br/api/'
var params = { headers: { 'Content-Type': 'application/json'}}

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
  login()
  me()
  cartoes()
  extrato()
}

// function check_campanha(){
//   const payload = JSON.stringify({
//     campanha: 'cards',
//   });

//   const res = POST('check-campanha',payload);
//   check(res, { 'campanha': (r) => r.status == 200 });
// }

// function check_document(){
//   const url = 'https://sandbox.yetzpay.com.br/api/check-document';
//   const payload = JSON.stringify({
//     document: '',
//     campanha: '',
//   });

//   const params = {
//     headers: {
//       'Content-Type': 'application/json',
//     },
//   };

//   const res = http.post(url, payload, params);
//   check(res, { 'document': (r) => r.status == 200 });
// } 

function login(){
  const payload = JSON.stringify({document: '', password: ''});
  const res = POST('login', payload);
  params.headers['Authorization'] = `Bearer ${res.json().access_token}` 
  campanha_id = res.json().campanhas[0].id
  check(res, { 'login': (r) => r.status == 200 });
} 

function me(){
  const res = GET(`usuario/me?campanhas[0]=${campanha_id}`);
  check(res, { 'me': (r) => r.status == 200 });
} 

function cartoes(){
  const res = GET(`cartao?campanhas[0]=${campanha_id}`);
  cartao_id = res.json()[0].id
  check(res, { 'cartoes': (r) => r.status == 200 });
} 

function extrato(){
  var date = new Date();
  var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
  firstDay = firstDay.toISOString().split('T')[0]
  var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
  lastDay = lastDay.toISOString().split('T')[0]

  const res = GET(`extrato/${cartao_id}?start=${firstDay}&end=${lastDay}`);
  check(res, { 'extrato': (r) => r.status == 200 });
} 
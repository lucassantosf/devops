import http from 'k6/http';
import { check, sleep } from 'k6';

const base_url = 'http://192.168.0.89:8000/api/webhooks/v1/'
var params = { headers: { 'Content-Type': 'application/json'}}

export const options = {
  vus: 1000,
  iterations: 1000, 
};

const POST = (route,payload) => {
  return http.post(`${base_url}${route}`, payload, params)
}

const GET = (route) => {
  return http.get(`${base_url}${route}`, params)
}

export default function () {
  webhook()
  // login()
  // me()
  // get_posts()
}

function webhook(){
  const payload = JSON.stringify({key231121: 'key11212121'});
  const res = POST('debug-97b7z46533owdzfntibxbwchs1spszr0', payload);
  check(res, { 'webhook': (r) => r.status == 200 });
} 

function login(){
  const payload = JSON.stringify({email: 'master@mail.com', password: 'password'});
  const res = POST('login', payload);
  params.headers['Authorization'] = `Bearer ${res.json().access_token}` 
  check(res, { 'login': (r) => r.status == 200 });
} 

function me(){
  const res = GET(`usuario/me`);
  check(res, { 'me': (r) => r.status == 200 });
} 

function get_posts(){
  const res = GET(`posts`);
  check(res, { 'posts': (r) => r.status == 200 });
} 

function random(){
  const value = Math.random() * (6 - 1) + 1;
  return Math.floor(value)
}
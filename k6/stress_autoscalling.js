import http from 'k6/http';
import { check, sleep } from 'k6';

const base_url = 'https://domain.com.br/api/'
var params = { headers: { 'Content-Type': 'application/json'}}

export const options = {
  vus: 10,
  iterations: 10, 
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
  get_posts()
}

function login(){
  const payload = JSON.stringify({document: '', password: ''});
  const res = POST('login', payload);
  params.headers['Authorization'] = `Bearer ${res.json().access_token}` 
  check(res, { 'login': (r) => r.status == 200 });
  sleep(random())
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
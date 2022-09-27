import http from 'k6/http';
import { check, sleep } from 'k6';

export default function () {
  check_campanha()
  check_document()
  login()
  me()
  cartoes()
  extrato()
}

function check_campanha(){
  const url = 'https://sandbox.yetzpay.com.br/api/check-campanha';
  const payload = JSON.stringify({
    campanha: 'cards',
  });

  const params = {
    headers: {
      'Content-Type': 'application/json',
    },
  };

  const res = http.post(url, payload, params);
  check(res, { 'campanha': (r) => r.status == 200 });
  // sleep(1)
}

function check_document(){
  const url = 'https://sandbox.yetzpay.com.br/api/check-document';
  const payload = JSON.stringify({
    document: '07216750004',
    campanha: 'cards',
  });

  const params = {
    headers: {
      'Content-Type': 'application/json',
    },
  };

  const res = http.post(url, payload, params);
  check(res, { 'document': (r) => r.status == 200 });
} 

function login(){
  const url = 'https://sandbox.yetzpay.com.br/api/login';
  const payload = JSON.stringify({
    document: '',
    password: '',
  });

  const params = {
    headers: {
      'Content-Type': 'application/json',
    },
  };

  const res = http.post(url, payload, params);
  check(res, { 'login': (r) => r.status == 200 });
} 

function me(){
  const url = 'https://sandbox.yetzpay.com.br/api/usuario/me?campanhas[0]=5';
  const params = {
    headers: {
      'Content-Type': 'application/json',
      'authorization': 'Bearer '
    },
  };

  const res = http.get(url, params);
  check(res, { 'me': (r) => r.status == 200 });
} 

function cartoes(){
  const url = 'https://sandbox.yetzpay.com.br/api/cartao?campanhas[0]=5';
  const params = {
    headers: {
      'Content-Type': 'application/json',
      'authorization': 'Bearer '
    },
  };

  const res = http.get(url, params);
  check(res, { 'cartoes': (r) => r.status == 200 });
} 

function extrato(){
  const url = 'https://sandbox.yetzpay.com.br/api/extrato/2?start=2022-08-01&end=2022-08-31';
  const params = {
    headers: {
      'Content-Type': 'application/json',
      'authorization': 'Bearer '
    },
  };

  const res = http.get(url, params);
  check(res, { 'extrato': (r) => r.status == 200 });
} 



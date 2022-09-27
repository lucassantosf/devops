Comando para executar script de stress test:

docker run --rm -i grafana/k6 run - <script.js
docker run --rm -i grafana/k6 run --vus 10 --duration 10s - <script.js
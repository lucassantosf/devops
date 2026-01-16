for ((i=1;i<=100;i++)); 
do
    curl -s "http://localhost:8080" | grep "<title>.*</title>"
    sleep 2s
done
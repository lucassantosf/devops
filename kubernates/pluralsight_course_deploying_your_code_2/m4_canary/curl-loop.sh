for ((i=1;i<=20;i++)); 
do
    curl -s "http://10.99.171.11" | grep "<title>.*</title>"
    sleep .5s
done
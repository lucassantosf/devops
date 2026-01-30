kompose convert 
kompose convert --stdout # just to see what will be generated
kompose convert --out ./output # to export into a folder
kompose convert --out ./output.yml # to export for a spepecif file
kompose convert -f docker-compose.stag.yml # when you want to convert from a specific docker .yml file that isn't named docker-compose.yml as default
kompose convert -h # help and check all flags

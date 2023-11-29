FROM python:3.7.3-stretch 

ENV PYTHONUNBUFFRED 1 

WORKDIR /app

COPY requirements.txt .

RUN pip install -r requirements.txt

COPY . .

EXPOSE 8000

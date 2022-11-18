FROM python:3.7-alpine
RUN mkdir /app
ADD . /app
WORKDIR /app
RUN pip install requests beautifulsoup4 python-dotenv
CMD ["python", "app.py"]
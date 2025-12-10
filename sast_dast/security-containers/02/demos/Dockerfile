# Define base image
FROM python:3.9-slim-buster

# Change working directory
WORKDIR /app

# Copy application code
COPY app.py /app/.

# Set container entrypoint
ENTRYPOINT ["python", "app.py"]

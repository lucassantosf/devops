# K6 Performance Testing Guide

## Overview
This document provides instructions for running K6 performance and stress testing scripts using Docker.

## Prerequisites
- Docker installed
- K6 Docker image
- Performance testing scripts

## Running Stress Tests

### Basic Execution
```bash
# Run a script with default settings
docker run --rm -i grafana/k6 run - <script.js
```

### Advanced Execution with Custom Parameters
```bash
# Specify virtual users and test duration
docker run --rm -i grafana/k6 run --vus 10 --duration 10s - <script.js
```

### Parameters Explained
- `--vus`: Number of virtual users (concurrent users)
- `--duration`: Total test duration
- `-`: Indicates script input from stdin

## Available Test Scripts
- `register.js`: User registration load test
- `stress.js`: Generic stress test
- `stress_aurora.js`: Aurora database performance test
- `stress_autoscalling.js`: Auto-scaling infrastructure test
- `stress_estoque.js`: Inventory management system test

## Best Practices
- Start with low virtual user counts
- Gradually increase load
- Monitor system resources
- Define clear performance thresholds

## Resources
- [K6 Official Documentation](https://k6.io/docs/)
- [Docker K6 Image](https://hub.docker.com/r/grafana/k6)

## Contribution
Improvements and additional test scripts are welcome.

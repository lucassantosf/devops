# Navigate into project directory

sudo docker run --rm --network host \
  -v "$(pwd)":/usr/src \
  -e SONAR_HOST_URL="http://localhost:9000" \
  -e SONAR_TOKEN="sqp_ceae705b053ce0a0601d7a29379598ee078cc0eb" \
  sonarsource/sonar-scanner-cli \
  -Dsonar.projectKey=yetzestoque \
  -Dsonar.sources=.


snyk --version

snyk auth

snyk test

snyk test --severity-threshold=high

snyk code test

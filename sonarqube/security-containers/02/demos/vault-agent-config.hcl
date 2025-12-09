# Define pid file
pid_file = "/tmp/vault-agent.pid"

# Define the address of the vault server
vault {
  address     = "http://127.0.0.1:8200"
}

# Define the authentication method (token) and where the token is stored
auto_auth {
  method "token_file" {
    config = {
      token_file_path = "/vault/secrets/token"
    }
  }
}

# Define templates to specify what secrets to retrieve and where to store them
template {
  destination = "/app/secrets/db_user"
  contents    = "{{ with secret \"secret/data/database\" }}{{ .Data.data.username }}{{ end }}"
  perms       = 0600
}

template {
  destination = "/app/secrets/db_pass"
  contents    = "{{ with secret \"secret/data/database\" }}{{ .Data.data.password }}{{ end }}"
  perms       = 0600
}

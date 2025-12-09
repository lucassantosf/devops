import os
import time

def connect_to_database():
    # Define db credentials
    username = "ps-user"
    password = "hardcoded-pass"
    # Printing credentials for demo purposes
    print(f"Connecting to database with user: {username}", flush=True)
    print(f"Connecting to database with password: {password}", flush=True)
    # Database connection logic here
    time.sleep(3600)

if __name__ == "__main__":
    connect_to_database()

# Increase volume disk EC2

- Go to console on EC2, volumes > modify , change de value of size from your ec2's volume

- Commands to recognize this configuration:

    - List all the volumes and partitions :

    sudo lsblk

    - Extend a partition named nvme0n1p1, use the following command:

    sudo growpart /dev/nvme0n1 1

    - Extend a file system mounted named /dev/nvme0n1p1, use the following command:

    sudo resize2fs /dev/nvme0n1p1

# Helpfuls :

https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/recognize-expanded-volume-linux.html
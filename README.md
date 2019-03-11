# knowledgebase
This project is based on Symonfy 4. The goal is to realize a internal knowledgebase system with full stack symfony. This is highly WIP.

## Install
1. Clone the repo 
2. Do composer install
3. Copy the .env.dist to .env and change the database data at the end of the file
4. Run the following command: bin/console doctrine:migrations:migrate
5. Do a yarn install and yarn build
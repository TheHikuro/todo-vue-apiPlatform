projectName = esgi-todo
projectVersion = 1.0.0
webServer = ./Web.API
webClient = ./Web.UI
dockerServer = ${webServer}/docker-compose.yml
dockerClient = ${webClient}/docker-compose.yml
export envFile = .env.local

build: 
	@echo "Building the project ${projectName} ${projectVersion} 🍺"
	@echo "Building the server 🍺"
	@cd ${webServer} && docker-compose -p ${projectName} build --no-cache --pull 
	@echo "Building the client 🍺"
	@cd ${webClient} && docker-compose -p ${projectName} build
	
start:
	@echo "Starting the project 🚀"
	@echo "Starting the server 🚀"
	@cd ${webServer} && docker-compose -p ${projectName} --env-file="${envFile}" up -d 
	@echo "Starting the client 🚀"
	@cd ${webClient} && docker-compose -p ${projectName} --env-file="${envFile}" up -d

stop:
	@echo "Stopping the project 🛑"
	@echo "Stopping the server 🛑"
	@echo "Stopping the client 🛑"
	docker-compose -p ${projectName} stop

clear: 
	@echo "Clearing the project 🧹"
	@echo "Clearing the server  🧹"
	@cd ${webServer} && docker-compose down
	@echo "Clearing the client 🧹"
	@cd ${webClient} && docker-compose down
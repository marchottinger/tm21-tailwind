install:
	@echo "The db socket path in wp-config.php needs to be fixed"
	@wp package install git@github.com:igorhrcek/wp-cli-secure-command.git
	@wp package install wp-cli/profile-command
	@wp plugin install two-factor
	@wp theme activate tm21-tailwind
	@wp theme list --status=inactive --field=name | xargs wp theme delete
	@npm i && npm audit fix
secure:
	@wp secure all
	@wp plugin activate two-factor
dev:
	@npm run watch-sync
prod:
	@echo "Production"
update:
	@wp core update
clean:
	@rm -rI node_modules
	@wp theme install twentytwentyfour --activate
	@wp secure flush
plugin-install:
	@./install-scripts/plugins.sh

# pour appliquer les règles de formatage et de style définies dans la configuration PHP CS Fixer
phpcs:
	docker pull oskarstark/php-cs-fixer-ga:latest
	docker run --rm -it -w=/app -v $(CURDIR):/app oskarstark/php-cs-fixer-ga:latest --diff
#	tools/php-cs-fixer/vendor/bin/php-cs-fixer fix

# pour valider la syntaxe et la structure d'un fichier YAML (dossier config)
lint_yaml:
	symfony console lint:yaml config --parse-tags

#  pour valider la syntaxe des fichiers Twig en environnement de prod
lint_twig:
	symfony console cache:clear --env=prod 
	symfony console lint:twig templates --env=prod

# pour vérifier la syntaxe et la validité des fichiers XLIFF de traduction
lint_xliff:
	symfony console lint:xliff translations

# pour vérifier la configuration du conteneur de services de Symfony sans afficher les messages
# de débogage. Cela permet de s'assurer que les services sont correctement définis 
# et prêts à être utilisés dans l'application.
lint_container:
	symfony console lint:container --no-debug

#  pour valider la coherence du schéma de la BDD sans appliquer de modifications à la BDD
# --skip-sync: pour sauter la synchronisation du schéma. => vérifier la validité du schéma 
# sans apporter de modifications à la BDD pour la rendre conforme au schéma actuel.
# -vvv pour afficher le niveau de détail des messages de sortie.  ici, niveau de détail est défini
# sur le plus élevé (-vvv), permet de voir des informations de débogage détaillées lors de l'exécution de la commande.
doctrine_schema_validate:
	symfony console doctrine:schema:validate --skip-sync -vvv --no-interaction

# pour vérifier que le fichier composer.json est correct
composer_validate:
	symfony composer validate --strict

# pour vérifier l'état de la sécurité de l'application:
# - Vulnérabilités connues dans les dépendances installées
# - Les paramètres de configuration de sécurité dans le fichier config/packages/security.yaml
# - Les permissions des fichiers et des répertoires importants du projet.
# - La configuration des pare-feux (firewalls) et des contrôles d'accès dans l'application.
check_security:
	symfony check:security

# pour faire une analyse statique du code PHP, détectera les erreurs potentielles telles que
# les appels de méthodes inexistants, les incompatibilités de types, les propriétés inaccessibles, les variables non définies, etc.
phpstan:
	symfony php vendor/bin/phpstan analyze

# pour exécuter les tests PHPUnit
phpunit:
	symfony php vendor/bin/phpunit

test:
	make phpcs lint_yaml lint_twig lint_xliff lint_container doctrine_schema_validate composer_validate check_security phpstan
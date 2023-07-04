import os
import shutil
import datetime

# Configurações do banco de dados
database_name = 'amauc'
db_username = 'root'
db_password = ''

# Configurações de backup
backup_folder = "C:/xampp/htdocs/amauc/sge/application/banco"  # Caminho absoluto para a pasta de backup
backup_filename = f'{database_name}_backup_{datetime.datetime.now().strftime("%Y-%m-%d_%H-%M-%S")}.sql'
backup_path = os.path.join(backup_folder, backup_filename)

# Comando para executar o backup
backup_command = f'mysqldump --user={db_username} --password={db_password} --host=localhost {database_name} > {backup_path}'

# Executar o comando de backup
os.system(backup_command)

# Verificar se o backup foi criado com sucesso
if os.path.exists(backup_path):
    print(f'O backup foi criado com sucesso em: {backup_path}')
else:
    print('Ocorreu um erro ao criar o backup.')

<div class="max-w-4xl mx-auto mt-35 mb-40 px-4">
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-blue-600">Minha Conta</h2>
            <a href="logout" class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">Sair</a>
        </div>

        <div class="space-y-6">

            <!-- Nome -->
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">Nome</p>
                    <p class="text-lg font-medium text-gray-800"><?= htmlspecialchars($user['name']) ?></p>
                </div>
                <a href="updateUser?field=name" class="text-sm text-blue-600 hover:underline">Alterar</a>
            </div>

            <!-- E-mail -->
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">E-mail</p>
                    <p class="text-lg font-medium text-gray-800"><?= htmlspecialchars($user['email']) ?></p>
                </div>
                <a href="updateUser?field=email" class="text-sm text-blue-600 hover:underline">Alterar</a>
            </div>

            <!-- Senha -->
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">Senha</p>
                    <p class="text-lg font-medium text-gray-800">****************</p>
                </div>
                <a href="updateUser?field=pswd" class="text-sm text-blue-600 hover:underline">Alterar</a>
            </div>

            <!-- Telefone -->
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">Telefone</p>
                    <p class="text-lg font-medium text-gray-800">
                        <?= !empty($user['phone']) ? htmlspecialchars($user['phone']) : 'Não cadastrado' ?>
                    </p>
                </div>
                <a href="updateUser?field=phone" class="text-sm text-blue-600 hover:underline">
                    <?= !empty($user['phone']) ? 'Alterar' : 'Cadastrar' ?>
                </a>
            </div>

            <!-- CPF -->
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">CPF</p>
                    <p class="text-lg font-medium text-gray-800">
                        <?= !empty($user['cpf']) ? htmlspecialchars($user['cpf']) : 'Não cadastrado' ?>
                    </p>
                </div>
                <a href="updateUser?field=cpf" class="text-sm text-blue-600 hover:underline">
                    <?= !empty($user['cpf']) ? 'Alterar' : 'Cadastrar' ?>
                </a>
            </div>

            <!-- Data de Nascimento -->
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">Data de Nascimento</p>
                    <p class="text-lg font-medium text-gray-800">
                        <?= !empty($user['bday']) ? htmlspecialchars($user['bday']) : 'Não cadastrada' ?>
                    </p>
                </div>
                <a href="updateUser?field=bday" class="text-sm text-blue-600 hover:underline">
                    <?= !empty($user['bday']) ? 'Alterar' : 'Cadastrar' ?>
                </a>
            </div>

            <!-- Endereço -->
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">Endereço</p>
                    <p class="text-lg font-medium text-gray-800">
                        <?= !empty($user['addr']) ? htmlspecialchars($user['addr']) : 'Não cadastrado' ?>
                    </p>
                </div>
                <a href="updateUser?field=addr" class="text-sm text-blue-600 hover:underline">
                    <?= !empty($user['addr']) ? 'Alterar' : 'Cadastrar' ?>
                </a>
            </div>

            <!-- Botão Ver Empresas -->
            <div class="pt-4">
                <a href="business" class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                    Ver Negócios
                </a>
            </div>
        </div>
    </div>
</div>
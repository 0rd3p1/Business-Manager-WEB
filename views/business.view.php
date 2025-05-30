<div class="max-w-5xl mx-auto mt-85 mb-100 px-4">
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-blue-600">Meus Negócios</h2>
            <a href="registerBusiness" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">Adicionar Negócio</a>
        </div>
        <?php if (empty($business)): ?>
            <div class="text-center text-gray-600 py-10">
                <p class="text-lg">Você ainda não cadastrou nenhum negócio</p>
                <a href="registerBusiness" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">Cadastrar Agora</a>
            </div>
        <?php else: ?>
            <div class="grid gap-6 md:grid-cols-4">
                <?php foreach ($business as $busi): ?>
                    <!-- Nome -->
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm">Nome</p>
                            <p class="text-lg font-medium text-gray-800"><?= htmlspecialchars($busi['name']) ?></p>
                            <a href="updateBusiness?field=name" class="text-sm text-blue-600 hover:underline">Alterar</a>
                        </div>
                    </div>

                    <!-- CNPJ -->
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm">CNPJ</p>
                            <p class="text-lg font-medium text-gray-800"><?= htmlspecialchars($busi['cnpj']) ?></p>
                            <a href="updateBusiness?field=cnpj" class="text-sm text-blue-600 hover:underline">Alterar</a>
                        </div>
                    </div>

                    <!-- Criação -->
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm">Data de Criação</p>
                            <p class="text-lg font-medium text-gray-800"><?= formatDate(htmlspecialchars($busi['register'])) ?></p>
                        </div>
                    </div>

                    <!-- Botão de Produtos -->
                    <div class="flex items-center">
                        <a href="product?idBusiness=<?= $busi['id'] ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                            Produtos de <?= $busi['name'] ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
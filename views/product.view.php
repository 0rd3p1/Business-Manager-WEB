<div class="max-w-5xl mx-auto mt-85 mb-100 px-4">
    <div class="bg-white shadow rounded-lg p-6">
        <?php foreach ($business as $busi): ?>
            <?php if ($busi['id'] == $_GET['id']): ?>
                <!-- Título e botão de adicionar -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-blue-600">
                        Produtos de <?= htmlspecialchars($business['name']) ?>
                    </h2>
                    <a href="registerProduct?id=<?= $business['id'] ?>" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                        Adicionar Produto
                    </a>
                </div>

                <!-- Lista de produtos -->
                <?php if (empty($product)): ?>
                    <div class="text-center text-gray-600 py-10">
                        <p class="text-lg">Nenhum produto cadastrado para este negócio</p>
                        <a href="registerProduct?id=<?= $business['id'] ?>" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                            Cadastrar Produto
                        </a>
                    </div>
                <?php else: ?>
                    <div class="grid gap-6 md:grid-cols-3">
                        <?php foreach ($products as $product): ?>
                            <div class="border border-gray-200 rounded-lg p-4 shadow-sm">
                                <p class="text-gray-500 text-sm">Nome</p>
                                <p class="text-lg font-medium text-gray-800"><?= htmlspecialchars($product['name']) ?></p>

                                <p class="text-gray-500 text-sm mt-2">Preço</p>
                                <p class="text-lg font-medium text-gray-800">R$ <?= number_format($product['price'], 2, ',', '.') ?></p>

                                <p class="text-gray-500 text-sm mt-2">Descrição</p>
                                <p class="text-sm text-gray-700"><?= nl2br(htmlspecialchars($product['description'])) ?></p>

                                <a href="updateProduct?id=<?= $product['id'] ?>" class="inline-block mt-4 text-sm text-blue-600 hover:underline">
                                    Editar Produto
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            <?php endif; ?>
        <?php endforeach; ?>

        <?php if (!$business['id'] == $_GET['id']): ?>
            <!-- Lista de empresas para escolha -->
            <h2 class="text-xl font-semibold text-blue-600 mb-6">Escolha a Empresa para Visualizar os Produtos</h2>

            <?php if (empty($businessList)): ?>
                <p class="text-gray-600">Nenhuma empresa cadastrada.</p>
            <?php else: ?>
                <div class="grid gap-4 md:grid-cols-2">
                    <?php foreach ($businessList as $busi): ?>
                        <div class="flex justify-between items-center border border-gray-200 p-4 rounded-md shadow-sm">
                            <div>
                                <p class="text-gray-800 font-medium text-lg"><?= htmlspecialchars($busi['name']) ?></p>
                                <p class="text-gray-500 text-sm">ID: <?= $busi['id'] ?></p>
                            </div>
                            <a href="products.php?id=<?= $busi['id'] ?>" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                                Ver Produtos
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
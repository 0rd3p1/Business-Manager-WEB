<div class="max-w-5xl mx-auto mt-85 mb-100 px-4">
    <div class="bg-white shadow rounded-lg p-6">
        <?php if (isset($_GET['idBusiness'])): ?>
            <?php foreach ($business as $busi): ?>
                <?php if ($busi['id'] == $_GET['idBusiness']): ?>
                    <!-- Título e botão de adicionar -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-blue-600">
                            Produtos de <?= htmlspecialchars($busi['name']) ?>
                        </h2>
                        <a href="registerProduct?idBusiness=<?= $busi['id'] ?>" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                            Adicionar Produto
                        </a>
                    </div>
                    <!-- Lista de produtos -->
                    <?php if (empty($product)): ?>
                        <div class="text-center text-gray-600 py-10">
                            <p class="text-lg">Nenhum produto cadastrado para este negócio</p>
                            <a href="registerProduct?idBusiness=<?= $busi['id'] ?>" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                                Cadastrar Produto
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="grid gap-6 md:grid-cols-3">
                            <?php foreach ($product as $prod): ?>
                                <!-- Nome -->
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-gray-500 text-sm">Nome</p>
                                        <p class="text-lg font-medium text-gray-800"><?= htmlspecialchars($prod['name']) ?></p>
                                        <a href="updateProduct?field=name&id=<?= $prod['id'] ?>" class="text-sm text-blue-600 hover:underline">Alterar</a>
                                    </div>
                                </div>

                                <!-- Preço -->
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-gray-500 text-sm">Preço</p>
                                        <p class="text-lg font-medium text-gray-800"><?= htmlspecialchars($prod['price']) ?></p>
                                        <a href="updateProduct?field=price&id=<?= $prod['id'] ?>" class="text-sm text-blue-600 hover:underline">Alterar</a>
                                    </div>
                                </div>

                                <!-- Descrição -->
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-gray-500 text-sm">Descrição</p>
                                        <p class="text-lg font-medium text-gray-800"><?= $prod['description'] ?></p>
                                        <a href="updateProduct?field=description&id=<?= $prod['id'] ?>" class="text-sm text-blue-600 hover:underline">Alterar</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <?php if (empty($business)): ?>
                <p class="text-gray-600">Nenhum negócio cadastrado</p>
            <?php else: ?>
                <div class="grid gap-4 md:grid-cols-1">
                    <?php foreach ($business as $busi): ?>
                        <div class="flex justify-between items-center border border-gray-200 p-4 rounded-md shadow-sm">
                            <div>
                                <p class="text-gray-800 font-medium text-lg"><?= htmlspecialchars($busi['name']) ?></p>
                            </div>
                            <a href="product?idBusiness=<?= $busi['id'] ?>" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                                Ver Produtos
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
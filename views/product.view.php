<div class="max-w-5xl mx-auto mt-77 mb-100 px-4">
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
                        <div class="grid gap-6 md:grid-cols-4">
                            <?php foreach ($product as $prod): ?>
                                <div class="border border-gray-200 rounded-lg p-4 shadow-sm space-y-3 flex flex-col justify-between">
                                    <div>
                                        <!-- Nome -->
                                        <p class="text-gray-500 text-sm">Nome</p>
                                        <p class="text-lg font-medium text-gray-800"><?= htmlspecialchars($prod['name']) ?></p>
                                        <a href="updateProduct?field=name&id=<?= $prod['id'] ?>" class="text-sm text-blue-600 hover:underline">Alterar</a>

                                        <!-- Preço -->
                                        <p class="mt-4 text-gray-500 text-sm">Preço</p>
                                        <p class="text-lg font-medium text-gray-800"><?= htmlspecialchars($prod['price']) ?></p>
                                        <a href="updateProduct?field=price&id=<?= $prod['id'] ?>" class="text-sm text-blue-600 hover:underline">Alterar</a>

                                        <!-- Descrição -->
                                        <p class="mt-4 text-gray-500 text-sm">Descrição</p>
                                        <p class="text-lg font-medium text-gray-800"><?= $prod['description'] ?></p>
                                        <a href="updateProduct?field=description&id=<?= $prod['id'] ?>" class="text-sm text-blue-600 hover:underline">Alterar</a>

                                        <!-- Quantidade em Estoque -->
                                        <p class="mt-4 text-gray-500 text-sm">Estoque</p>
                                        <p class="text-lg font-medium text-gray-800"><?= htmlspecialchars($prod['stock']) ?> unidades</p>
                                        <a href="updateProduct?field=stock&id=<?= $prod['id'] ?>" class="text-sm text-blue-600 hover:underline">Alterar</a>
                                    </div>

                                    <div class="flex gap-2 mt-6">
                                        <!-- Botão de pagamento -->
                                        <a href="payment?id=<?= $prod['id'] ?>"
                                            class="flex-1 text-center bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                                            Pagar
                                        </a>

                                        <!-- Botão de exclusão -->
                                        <a href="delete?id=<?= $prod['id'] ?>&table=products"
                                            class="flex-1 text-center bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                                            Excluir
                                        </a>
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
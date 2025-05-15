document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('carrinho-badge-container');
    if (!container) return;

    const badge = container.querySelector('.badge.bg-danger');
    if (!badge) return;

    function atualizarBadge() {
        fetch('/carrinho/quantidade', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text())
            .then(qtd => {
                badge.textContent = qtd;
            });
    }

    atualizarBadge();
    setInterval(atualizarBadge, 10000);

    // Adicionar ao carrinho
    document.querySelectorAll('form[action*="adicionar-ao-carrinho"]').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const url = form.action;
            const formData = new FormData(form);

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
                .then(async response => {
                    let data;
                    try {
                        data = await response.json();
                    } catch {
                        data = {};
                    }
                    if (response.ok) {
                        atualizarBadge();
                        // Mensagem de sucesso (pode trocar por toast)
                    } else if (response.status === 401) {
                        window.location.href = '/login';
                    } else {
                        alert(data.message || 'Erro ao adicionar ao carrinho!');
                    }
                })
                .catch(() => {
                    alert('Erro ao adicionar ao carrinho!');
                });
        });
    });

    // Remover item do carrinho
    document.querySelectorAll('form[action*="carrinho/remover"]').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const url = form.action;
            const formData = new FormData(form);

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
                .then(async response => {
                    let data;
                    try {
                        data = await response.json();
                    } catch {
                        data = {};
                    }
                    if (response.ok) {
                        atualizarBadge();
                        // Remove a linha da tabela
                        if (form.closest('tr')) {
                            form.closest('tr').remove();
                            atualizarTotalCarrinho(); // <-- ATUALIZA O TOTAL AQUI!
                        }
                    } else if (response.status === 401) {
                        window.location.href = '/login';
                    } else {
                        alert(data.message || 'Erro ao remover do carrinho!');
                    }
                })
                .catch(() => {
                    alert('Erro ao remover do carrinho!');
                });
        });
    });

    // Limpar carrinho
    const limparBtn = document.querySelector('[data-limpar-carrinho]');
    if (limparBtn) {
        limparBtn.addEventListener('click', function (e) {
            e.preventDefault();
            fetch(limparBtn.getAttribute('href'), {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(async response => {
                    if (response.ok) {
                        atualizarBadge();
                        // Remove todos os itens da tabela
                        document.querySelectorAll('table tbody tr').forEach(tr => tr.remove());
                    } else if (response.status === 401) {
                        window.location.href = '/login';
                    } else {
                        alert('Erro ao limpar o carrinho!');
                    }
                })
                .catch(() => {
                    alert('Erro ao limpar o carrinho!');
                });
        });
    }

    // Função para atualizar o total do carrinho em tempo real
    function atualizarTotalCarrinho() {
        let total = 0;
        document.querySelectorAll('#tabela-carrinho tbody tr').forEach(tr => {
            const totalItem = tr.querySelector('.total-item');
            if (totalItem) {
                total += parseFloat(totalItem.textContent.replace('.', '').replace(',', '.'));
            }
        });
        document.getElementById('total-carrinho').textContent = total.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    // Alterar quantidade
    document.querySelectorAll('.btn-quantidade').forEach(btn => {
        btn.addEventListener('click', function () {
            const tr = btn.closest('tr');
            const input = tr.querySelector('.quantidade-input');
            let quantidade = parseInt(input.value);
            const precoUnitario = parseFloat(tr.querySelector('.preco-unitario').textContent.replace('.', '').replace(',', '.'));
            const itemId = tr.getAttribute('data-item-id');
            let novaQuantidade = quantidade;

            if (btn.dataset.action === 'menos') {
                novaQuantidade = quantidade - 1;
            } else if (btn.dataset.action === 'mais') {
                novaQuantidade = quantidade + 1;
            }

            if (novaQuantidade <= 0) {
                if (confirm('Deseja remover este item do carrinho?')) {
                    // Submete o form de remover
                    tr.querySelector('.form-remover').dispatchEvent(new Event('submit', { cancelable: true, bubbles: true }));
                }
                return;
            }

            // Atualiza quantidade via AJAX
            fetch(`/carrinho-item/${itemId}/atualizar-quantidade`, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ quantidade: novaQuantidade })
            })
                .then(response => response.json())
                .then(data => {
                    input.value = novaQuantidade;
                    tr.querySelector('.total-item').textContent = (precoUnitario * novaQuantidade).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                    atualizarTotalCarrinho(); // <-- ATUALIZA O TOTAL AQUI!
                    if (window.atualizarBadge) window.atualizarBadge();
                });
        });
    });

    // Atualiza o total ao carregar
    atualizarTotalCarrinho();

    window.atualizarBadge = atualizarBadge;
});

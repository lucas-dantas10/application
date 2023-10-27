const tableBody = $('.table-body');
const showingQuantityPeoples = $('.showing-count-line');
const URL = 'http://localhost:8000/index.php?r=pessoas/index';

$(document).ready(function () {
    var currentPage = 1;

    function loadPage(page) {
        $.ajax({
            url: 'index.php?r=pessoas/index',
            type: 'GET',
            dataType: 'json',
            data: {page: page},
            success: function(data) {
                console.log(data)
                tableBody[0].innerHTML = '';
                data.peoples.forEach(people => {
                    const attributes = people.atributos.map(res => res.nome).join(', ');

                    tableBody[0].innerHTML += `
                    <tr>
                        <th scope="row">${people.id}</th>
                        <td>${people.nome}</td>
                        <td>
                        ${people.atributos.length != 0 
                            ? attributes
                            : 'Nenhum atributo'}
                        </td>
                        <td>
                            <a href="http://localhost:8000/index.php?r=pessoas/view&id=${people.id}" class="btn btn-primary">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a id="delete" href="http://localhost:8000/index.php?r=pessoas/destroy&id=${people.id}" class="btn btn-danger">
                                Deletar
                            </a>
                        </td>
                    </tr>
                    `
                });

                showingQuantityPeoples[0].innerHTML = `
                    <p class="text-secondary">Mostrando ${data.peoples.length} de ${data.pagination.totalCount}</p>
                `;
            },
            error: function() {
                alert('Ocorreu um erro ao carregar a página ' + page);
            }
        });
    }

    loadPage(currentPage);

    $('#next-page').click(function() {
        currentPage++;
        loadPage(currentPage);
    });
    
    $('#prev-page').click(function() {
        if (currentPage > 1) {
            currentPage--;
            loadPage(currentPage);
        }
    });
});
const tableBody = $('.table-body');
const showingQuantityPeoples = $('.showing-count-line');
const inputName = $('#name');
const btnSearch = $('#btn-search');
let search = '';

$(document).ready(function () {
    var currentPage = 1;

    function loadPage(page) {
        $.ajax({
            url: `index.php?r=atributos/index${search != '' ? '&search=' + search : ''}`,
            type: 'GET',
            dataType: 'json',
            data: {page: page},
            success: function(data) {
                tableBody[0].innerHTML = '';
                data.attributes.forEach(attr => {
                    tableBody[0].innerHTML += `
                    <tr>
                        <th scope="row">${attr.id}</th>
                        <td>${attr.nome}</td>
                        <td>
                            ${attr.pessoa_id}
                        </td>
                        <td>
                            <a href="http://localhost:8000/index.php?r=atributos/view&id=${attr.id}" class="btn btn-primary">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a id="delete" href="http://localhost:8000/index.php?r=atributos/destroy&id=${attr.id}" class="btn btn-danger">
                                Deletar
                            </a>
                        </td>
                    </tr>
                    `
                });

                showingQuantityPeoples[0].innerHTML = `
                    <p class="text-secondary">Mostrando ${data.attributes.length} de ${data.pagination.totalCount}</p>
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

    btnSearch.click((e) => {
        search = inputName.val();
        loadPage(currentPage);
    });
});
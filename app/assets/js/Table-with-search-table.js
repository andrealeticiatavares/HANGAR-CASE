$(document).ready(function() {
  $(".search").keyup(function() {
    var searchTerm = $(this).val().toLowerCase(); // Obtém o valor do campo de busca em minúsculas
    var listItem = $('.results tbody tr'); // Todos os itens na tabela
    var noResult = $(".no-result"); // Linha que mostra quando não há resultados

    listItem.each(function() {
      var country = $(this).find("td:eq(1)").text().toLowerCase(); // Obtém o país
      if (country.indexOf(searchTerm) >= 0) { // Verifica se o texto contém a busca
        $(this).show(); // Mostra a linha
      } else {
        $(this).hide(); // Esconde a linha
      }
    });

    var visibleItems = $('.results tbody tr:visible').length; // Conta os itens visíveis
    $('.counter').text(visibleItems + ' itens'); // Atualiza o contador

    if (visibleItems === 0) { 
      noResult.show(); // Mostra aviso se não há resultados
    } else {
      noResult.hide(); // Esconde aviso se há resultados
    }
  });
});

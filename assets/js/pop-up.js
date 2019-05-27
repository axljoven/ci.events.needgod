$(document).ready(function() {
      let triggers = $('.stat-popup-trigger')
      triggers.each((id, value) => {
            let popupID = "#registrants-table #popup" + id
            $(popupID).popup();
      })
})
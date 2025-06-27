function doPost(e) {
  var sheet = SpreadsheetApp.openById("ID_FEUILLE").getSheetByName("Feuille1");
  sheet.appendRow([e.parameter.nom, e.parameter.email, new Date()]);
  return ContentService.createTextOutput("Inscription enregistrée !");
}

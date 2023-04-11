<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="container p-2">
    <div class="row">
        <div class="card w-100">
            <form method="post" action="/teklif">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">TEKLİF AÇIKLAMASI <input type="text" class="form-control"
                                                                         id="description" name="description"></li>
                    <li class="list-group-item">MÜŞTERİ <input type="text" class="form-control" id="customer"
                                                               name="customer">
                    </li>
                    <li class="list-group-item">DÜZENLEME TARİHİ <input type="date" class="form-control"
                                                                        name="edit_date" id="edit_date"></li>
                    <li class="list-group-item">VADE TARİHİ
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" onclick="expiryDate(0)" class="btn btn-secondary ml-5">AYNI GÜN</button>
                            <button type="button" onclick="expiryDate(7)" class="btn btn-secondary">7 GÜN</button>
                            <button type="button" onclick="expiryDate(14)" class="btn btn-secondary">14 GÜN</button>
                            <button type="button" onclick="expiryDate(30)" class="btn btn-secondary">30 GÜN</button>
                            <button type="button" onclick="expiryDate(60)" class="btn btn-secondary">60 GÜN</button>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <button type="button" onclick="showCurrencies()" id="currencyButton" class="btn btn-outline-danger">DÖVİZ DEĞİŞTİR
                        </button>
                        <select id="currency" name="currency" style="display: none;">
                            <option>TL</option>
                            <option>Dolar</option>
                            <option>Euro</option>
                            <option>Sterlin</option>
                        </select>
                        <button type="button" id="offerButton" onclick="showOfferInfo()" class="btn btn-outline-danger">SİPARİŞ BİLGİSİ EKLE</button>
                        <div id="offerInfo" style="display: none;">
                            <input type="text" class="form-control" id="no"
                                   name="no">
                            <input type="date" class="form-control" id="offer_date" name="offer_date">
                        </div>
                    </li>
                    <li class="list-group-item">TEKLİF KOŞULLARI <textarea type="text" class="form-control"
                                                                           id="rules" name="rules"
                                                                           placeholder="Teklifin geçerli olduğu süre,ödeme şartları vb. bilgiler için bu alanı kullanabilirsiniz."></textarea>
                    </li>
                    <li class="list-group-item">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>

                                <th scope="col">HİZMET/ÜRÜN</th>
                                <th scope="col">MİKTAR</th>
                                <th scope="col">BİRİM</th>
                                <th scope="col">BR. FİYAT</th>
                                <th scope="col">VERGİ</th>
                                <th scope="col">TOPLAM</th>
                            </tr>
                            </thead>
                            <tbody id="products">
                            <tr>

                                <td><input type="text" class="form-control" id="item" name="products[0][item]"></td>
                                <td><input type="text" class="form-control" id="amount" name="products[0][amount]"
                                           placeholder="1,00"></td>
                                <td><select id="unit" name="products[0][unit]">
                                        <option>adet</option>
                                        <option>ay</option>
                                        <option>çift</option>
                                        <option>çuval</option>
                                        <option>dakika</option>
                                        <option>desilitre</option>
                                        <option>desimetre</option>
                                        <option>file</option>
                                        <option>gram</option>
                                        <option>gün</option>
                                        <option>hafta</option>
                                        <option>kamyon</option>
                                        <option>kilogram</option>
                                        <option>desimetre</option>
                                        <option>koli</option>
                                        <option>litre</option>
                                        <option>metre</option>
                                        <option>metrekare</option>
                                        <option>metreküp</option>
                                        <option>miligram</option>
                                        <option>milimetre</option>
                                        <option>paket</option>
                                        <option>palet</option>
                                        <option>poşet</option>
                                        <option>saat</option>
                                        <option>sandık</option>
                                        <option>saniye</option>
                                        <option>santimetre</option>
                                        <option>ton</option>
                                        <option>yıl</option>
                                        <option>diğer</option>
                                    </select></td>
                                <td><input type="text" class="form-control" id="price" name="products[0][price]" placeholder="0,00">
                                </td>
                                <td><select id="tax" name="tax">
                                        <option>%18</option>
                                        <option>%8</option>
                                        <option>%1</option>
                                        <option>%0</option>
                                    </select></td>
                                <td><input type="text" class="form-control" id="total_price" name="products[0][total_price]"
                                           placeholder="0,00"></td>
                            </tr>

                            </tbody>
                        </table>
                    </li>
                </ul>
                <button type="button" id="addNewRow" class="btn btn-warning">YENİ SATIR EKLE</button>
                <button type="button" class="btn btn-dark">×</button>

                <BR><BR>
                <button type="button" class="btn btn-success">KAYDET</button>
                <button type="button" class="btn btn-danger">VAZGEÇ</button>

            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script>
    function showCurrencies() {
        var x = document.getElementById("currency");
        x.style.display = "block";
        x = document.getElementById("currencyButton");
        x.style.display = "none";
    }
    function showOfferInfo() {
        var x = document.getElementById("offerInfo");
        x.style.display = "block";
        x = document.getElementById("offerButton");
        x.style.display = "none";
    }
    function expiryDate(days){
        var result = new Date(Date.now());
        result.setDate(result.getDate() + days);
        console.log(result.toISOString().slice(0, 10));
        document.getElementById("expiry_date").value = result.toISOString().slice(0, 10);
    }
</script>
<script type="text/javascript">
    var i = 0;
    $("#addNewRow").click(function () {
        ++i;
        $("#products").append('<tr>                                <td><input type="text" class="form-control" id="item" name="products[' + i +'][item]"></td>                                <td><input type="text" class="form-control" id="amount" name="products[' + i +'][amount]"                                           placeholder="1,00"></td>                                <td><select id="unit" name="products[' + i +'][unit]">                                        <option>adet</option>                                        <option>ay</option>                                        <option>çift</option>                                        <option>çuval</option>                                        <option>dakika</option>                                        <option>desilitre</option>                                        <option>desimetre</option>                                        <option>file</option>                                        <option>gram</option>                                        <option>gün</option>                                        <option>hafta</option>                                        <option>kamyon</option>                                        <option>kilogram</option>                                        <option>desimetre</option>                                        <option>koli</option>                                        <option>litre</option>                                        <option>metre</option>                                        <option>metrekare</option>                                        <option>metreküp</option>                                        <option>miligram</option>                                        <option>milimetre</option>                                        <option>paket</option>                                        <option>palet</option>                                        <option>poşet</option>                                        <option>saat</option>                                        <option>sandık</option>                                        <option>saniye</option>                                        <option>santimetre</option>                                        <option>ton</option>                                        <option>yıl</option>                                        <option>diğer</option>                                    </select></td>                                <td><input type="text" class="form-control" id="price" name="products[' + i +'][price]" placeholder="0,00">                                </td>                                <td><select id="tax" name="tax">                                        <option>%18</option>                                        <option>%8</option>                                        <option>%1</option>                                        <option>%0</option>                                    </select></td>                                <td><input type="text" class="form-control" id="total_price" name="products[' + i +'][total_price]"                                           placeholder="0,00"></td>                            </tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
</body>
</html>

// Basit bir randevu listesi
let randevular = [];

// HTML elementlerini seçme
const randevuForm = document.getElementById("randevuForm");
const randevuListesi = document.getElementById("randevuListesi");

// Randevu ekleme fonksiyonu
function randevuEkle() {
    const tarih = document.getElementById("tarih").value;
    const saat = document.getElementById("saat").value;
    const alan = document.getElementById("alan").value;
    const notlar = document.getElementById("notlar").value;

    // Yeni bir randevu objesi oluşturma
    const yeniRandevu = {
        tarih,
        saat,
        alan,
        notlar
    };

    // Randevuyu listeye ekleme
    randevular.push(yeniRandevu);

    // Formu sıfırlama
    randevuForm.reset();

    // Randevu listesini güncelleme
    randevuListesiniGuncelle();
}

// Randevu listesini güncelleme fonksiyonu
function randevuListesiniGuncelle() {
    // Randevu listesi div'ini temizleme
    randevuListesi.innerHTML = "";

    // Her randevuyu listeye ekleme
    randevular.forEach((randevu, index) => {
        const randevuItem = document.createElement("div");
        randevuItem.classList.add("randevu-item");
        randevuItem.innerHTML = `
            <p><strong>Tarih:</strong> ${randevu.tarih}</p>
            <p><strong>Saat:</strong> ${randevu.saat}</p>
            <p><strong>Alan Kişi:</strong> ${randevu.alan}</p>
            <p><strong>Notlar:</strong> ${randevu.notlar}</p>
            <button onclick="randevuSil(${index})">Sil</button>
        `;
        randevuListesi.appendChild(randevuItem);
    });
}

// Randevu silme fonksiyonu
function randevuSil(index) {
    randevular.splice(index, 1);
    randevuListesiniGuncelle();
}

// Sayfa yüklendiğinde randevu listesini gösterme
randevuListesiniGuncelle();

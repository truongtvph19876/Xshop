var citis = document.getElementById("city");
let idcitis = citis.querySelector("#idcistis");

var districts = document.getElementById("district");
let iddistricts = districts.querySelector("#iddistricts");

var wards = document.getElementById("ward");
let idwards = wards.querySelector("#idwards");

let url = "./views/js/db.json";
let promise = fetch(url);

promise.then(response => 
  response.json().then(data => ({
      data: data,
  })
  ).then(res => {
  // console.log(res.data);
  renderCity(res.data);
}));

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
    
  }
  // xứ lý khi thay đổi tỉnh thành thì sẽ hiển thị ra quận huyện thuộc tỉnh thành đó
  citis.onchange = function () {
    districts.length = 1;
    wards.length = 1;
   
    if(this.value != ""){
      const result = data.filter(n => n.Id === this.value);

      for (const k of result[0].Districts) {
        districts.options[districts.options.length] = new Option(k.Name, k.Id);
      }
    }
  };
   // xứ lý khi thay đổi quận huyện thì sẽ hiển thị ra phường xã thuộc quận huyện đó
  districts.onchange = function () {
    wards.length = 1;
    const dataCity = data.filter((n) => n.Id === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
  };
}

let cityAPI = "https://thongtindoanhnghiep.co/api/city";
let rawDistrictAPI = "https://thongtindoanhnghiep.co/api/city/id-city/district";
let rawWardAPI = "https://thongtindoanhnghiep.co/api/district/id-district/ward";
let asd = "http://127.0.0.1:8000/api/coffees";

function getCitiesFromAPI(cityAPI) {
    let data = fetch(cityAPI, {
        method: 'GET',
        mode: 'cors',
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
        },
    })
        .then(res => {
            return res.json();
        })
        .then(cityasJSON => {
            let cities = cityasJSON;
            return cities;
        })
        .catch(err => {
            console.log('API ERROR!!');
        });
    return data;
}

function getDistrictesFromAPI(rawDistrictAPI, idCity) {
    let districtAPI = rawDistrictAPI.replace('id-city', idCity);
    fetch(districtAPI)
        .then(res => {
            return res.json();
        })
        .then(districtasJSON => {
            let districtes = districtasJSON;
            return districtes;
        })
        .catch(err => {
            console.log('API ERROR!!');
        });
}

function getWardFromAPI(rawWardAPI, idDistrict) {
    let wardAPI = rawWardAPI.replace('id-district', idDistrict);
    fetch(wardAPI)
        .then(res => {
            return res.json();
        })
        .then(wardasJSON => {
            let wardes = wardasJSON;
            return wardes;
        })
        .catch(err => {
            console.log('API ERROR!!');
        });
}

const fetchData = async () => {
    let data = await getCitiesFromAPI(cityAPI);
    console.log(data)
}

window.addEventListener('load', fetchData);
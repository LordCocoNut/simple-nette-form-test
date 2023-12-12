const formVat = document.getElementById("frm-companyRegistrationForm-vat");
const formAddress = document.getElementById("frm-companyRegistrationForm-address");
const formCompanyName = document.getElementById("frm-companyRegistrationForm-company_name");
const formStatutoryName = document.getElementById("frm-companyRegistrationForm-statutory_representative_full_name");
const formIco = document.getElementById("frm-companyRegistrationForm-ico");

/**
 * @param {Number|String} ico
 * @returns {Promise<void>}
 */
const aresRequest = async (ico) => {
    //THis is very simple solution, but no need to find any specialities for now
    const url = `https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty-rzp/${parseInt(ico)}`;

    //get data
    const result = await fetch(url);

    //
    if (!result.ok) {
        return console.error(`Unable to fetch data from ares ${await result.text()}`);
    }

    //We will select only first record to avoid pickers etc. as not necessary for the example
    const resultData = (await result.json()).zaznamy?.[0];

    if (!result.ok) {
        return console.warn(`Pro ico ${ico} nebyly nalezeny zadne zaznamy`);
    }

    //TODO: ensure that: VAT might not be provided, in that case, the VAT is most likely typical set of STATE+ICO code
    const dic = resultData.dic ?? `${resultData.sidlo.kodStatu}${resultData.ico}`;
    const companyName = resultData.obchodniJmeno ?? '';
    const statutoryRepresentative = resultData.angazovaneOsoby.find((record) => record.typAngazma === "STATUTARNI_ZASTUPCE_RZP");
    const companyAddress = resultData.sidlo.textovaAdresa;


    //Set form values
    formVat.value = dic;
    formAddress.value = companyAddress;
    formCompanyName.value = companyName;
    formStatutoryName.value = `${statutoryRepresentative.titulPredJmenem ?? ''} ${statutoryRepresentative.jmeno ?? ''} ${statutoryRepresentative.prijmeni ?? ''} ${statutoryRepresentative.titulZaJmenem ?? ''}`.trim();

}


formIco && formIco.addEventListener('change', ({target}) => aresRequest(target.value));
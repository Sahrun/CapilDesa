const config = {
    apiUrl: "http://127.0.0.1:8000/api/",
    webUrl: "http://127.0.0.1:8000/",
    Page_404: "404",
    HeaderRequest: {
      baseUrl: "http://127.0.0.1:8000/",
      ContentType: "application/json"
    },
    routeApi: {
      religion:{
            all:"religion/all",
            save:"religion/save",
            delete:"religion/delete",
            getById:"religion/getById",
            update:"religion/update/",

      }
    //   user: "user/users",
    //   navigation: "general/navigation",
    //   religion: "warga/wargas",
    //   wargaSave: "warga/save",
    //   ChekingExistingNIK: "warga/checkingExistingNIK/"
    },
    alertType: {
      error: "error",
      success: "success",
      warning: "warning"
    },
    modalType: {
      show: "show",
      hide: "hide"
    },
    inputType: {
      text: "text",
      checkbox: "checkbox",
      file: "file",
      radio: "radio",
      number: "number",
      date: "date"
    },
    Grid:{
      show:[10,25,50,100],
      defaultShow:10,
    }
  };
  export default config;
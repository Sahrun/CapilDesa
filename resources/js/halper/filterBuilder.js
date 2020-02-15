const  filterBuilder = {
    operation: {
        like: "like",
        equals: "equals"
      },
    properties: {
        filed: "field",
        operation: "operation",
        value: "value",
        sparator:"/",
    },
    generateFilter
};
function generateFilter(fields,props=null) {
    var uri = "";
    var field = "";
    fields.forEach(rows => {
        field = field.concat(
        (field !== "" ? "," : "") +
          rows.field +
          filterBuilder.properties.sparator +
          rows.operation +
          filterBuilder.properties.sparator +
          rows.value
      );
    });
   
    if (field !== "") {
      uri =
        "?field=" +
        field +
        (props.show !== null ? "&show=" + props.show : "") +
        (props.page !== null ? "&page=" + props.page : "")+
        (props.sorting_by !== null ? "&order_by=" + props.sorting_by : "")+
        (props.sorting !== null ? "&order=" + props.sorting : "");
    } else {
      uri =
        "?" +
         (props.show !== null ? "show=" + props.show : "") +
         (props.page !== null ? (props.show !== null ? "&" : "") + "page=" + props.page : "")+
         (props.sorting_by !== null ? "&order_by=" + props.sorting_by : "")+
         (props.sorting !== null ? "&order=" + props.sorting : "");
    }
    return uri;
}



export default filterBuilder;
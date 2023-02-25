import axios from "axios";
import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import { ReactSearchAutocomplete } from "react-search-autocomplete";

export default function SearchBoxSiswa(props) {
  const [data, setData] = useState([]);

  const getDataSiswaByKeyword = async () => {
    try {
      const response = await fetch("/api/search/siswa")
        .then((res) => res.json())
        .then((res) => res.data);
      setData(response);
    } catch (e) {}
  };

  useEffect(() => {
    getDataSiswaByKeyword();
  }, []);

  const handleOnSearch = (string, results) => {
    // onSearch will have as the first callback parameter
    // the string searched and for the second the results.
    console.log(string, results);
  };

  const handleOnHover = (result) => {
    // the item hovered
    // console.log(result);
  };

  const handleOnSelect = async (item) => {
    try {
      let response = await axios
        .put(`/api/update/siswa/${item.id}`, {
          kelas_id: props.kelas,
        })
        .then((res) => res.data);
      console.log(response);
      if (props.statusId == 1) {
        return (location.href = "/kelas/siswa/" + props.kelas);
      }
      return (location.href = "/siswa/wali-kelas/" + props.kelas);
    } catch (error) {}
  };

  const handleOnFocus = () => {
    console.log("Focused");
  };

  const formatResult = (item) => {
    return (
      <div className="w-full cursor-pointer">
        <div className="flex flex-col md:items-center md:flex-row gap-x-5">
          <img
            src={`/assets/img/profile/siswa/` + item.image_profile}
            alt={item.image_profile}
            className="w-8 h-8 rounded-full shadow-md"
          />
          <p>{item.nama}</p>
          <p className="font-bold">{item.no_induk}</p>
        </div>
      </div>
    );
  };

  return (
    <div className="flex flex-col justify-center w-full gap-y-5">
      <ReactSearchAutocomplete
        items={data}
        onSearch={handleOnSearch}
        onHover={handleOnHover}
        onSelect={handleOnSelect}
        onFocus={handleOnFocus}
        autoFocus
        formatResult={formatResult}
        fuseOptions={{ keys: ["nama", "id"] }}
      ></ReactSearchAutocomplete>
    </div>
  );
}

if (document.getElementById("searchBoxSiswa")) {
  const item = document.getElementById("searchBoxSiswa");
  ReactDOM.render(
    <SearchBoxSiswa
      kelas={item.getAttribute("kelas")}
      statusId={item.getAttribute("status-id")}
    />,
    item
  );
}

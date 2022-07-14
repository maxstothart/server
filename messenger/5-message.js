var msg = {
  // (A) HELPER - AJAX FETCH
  ajax : (data, after) => {
    // (A1) FORM DATA
    let fdata = new FormData();
    for (const [k,v] of Object.entries(data)) { fdata.append(k, v); }

    // (A2) FETCH
    fetch("6-ajax.php", { method:"POST", body:fdata })
    .then((res) => {
      if (res.status!=200) { alert(`Server ${res.status} error.`) }
      else { return res.text(); }
    }).then(after).catch((err) => { console.error(err); });
  },

  // (B) SHOW MESSAGES
  uid : null,  // CURRENT SELECTED USER
  show : (uid) => {
    // (B1) SET SELECTED USER ID
    msg.uid = uid;

    // (B2) HTML INTERFACE UPDATE
    let form = document.getElementById("userSend"),
        field = document.getElementById("msgTxt"),
        unread = document.getElementById("ur"+uid),
        wrap = document.getElementById("userMsg");
    wrap.innerHTML = "";
    form.style.display = "flex";
    field.value = "";
    field.focus();
    for (let r of document.querySelectorAll(".userRow")) {
      if (r.id=="usr"+uid) { r.classList.add("now"); }
      else { r.classList.remove("now"); }
    }

    // (B3) AJAX LOAD MESSAGES
    msg.ajax({
      "req" : "list",
      "uid" : uid
    }, (txt) => {
      wrap.innerHTML = txt;
      if (unread!==null) { unread.remove(); }
    });
  },

  // (C) SEND MESSAGE
  send : () => {
    let field = document.getElementById("msgTxt");
    msg.ajax({
      "req" : "send",
      "to" : msg.uid,
      "msg" : field.value
    }, (txt) => {
      if (txt == "OK") {
        msg.show(msg.uid);
        field.value = "";
      } else { alert(txt); }
    });
    return false;
  }
};

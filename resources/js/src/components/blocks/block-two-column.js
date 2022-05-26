(() => {
    const app1 = new Vue({
      el: "#app",
      data: {
        message: "Hello Vue!"
      },
      template: '<div>{{message}}</div>'
    });
  })();
  
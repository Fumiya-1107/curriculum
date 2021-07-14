var app = new Vue({
    el: '#app',
    data: {
        list: [],
        addText: '',
        keyword: ''
    },

    //watchでlistの変更を監視
    watch: {
        list: {
            handler: function() {
                //localStorageにデータを保存
                localStorage.setItem("list", JSON.stringify(this.list));
            },
            deep: true
        }
    },

    //マウントされた時にlocalStorageからデータを取得
    mounted: function() {
        this.list = JSON.parse(localStorage.getItem("list")) || [];
    },
    
    methods: {
        addToDo: function() {
            if (this.addText !== '') {
                this.list.push({
                    text: this.addText, 
                    isChecked: false,
                });
                this.addText = '';
            }
        },
        deleteBtn: function() {
            this.list = this.list.filter(function(todo) {
                return !todo.isChecked;
            });
        },
        filterLists: function() {
            var filtered = [];
            for (var i in this.list) {
                var list = this.list[i];
                var text = this.addText
                if (list.text.indexOf(this.keyword) !== -1) {
                    filtered.push(list);
                }
            }
            return filtered;
        }
    },

    computed: {
        remaining: function() {
            var count = 0;
            var todos = this.list;
            var length = todos.length;
            for(var i = 0; i < length; i++) {
                if(!todos[i].isChecked) {
                    count++;
                }
            }
            return count;
        },
        filteredLists: function() {
            return this.filterLists();
        }
    }
});
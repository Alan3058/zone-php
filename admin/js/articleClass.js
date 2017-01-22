/**
 * 文章类别
 */
var ArticleClass = function() {
	
	return {
		/**
		 * 新增
		 */
		addHandler: function() {
			var tr = $("<tr></tr>");
			tr.append($("<td></td>").append('<input type="text" class="text-hide" name="id[]"/>').append('<input type="text" class="input-lg" name="className[]"/>'));
			tr.append($("<td></td>").append('<a id="articleClassAdd">添加</a>'));
			$("#articleClassDetailTbody").append(tr);
		},
	};
}();

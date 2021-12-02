<?php layout() ?>

<?php slot('content') ?>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<div class="styled-html">
		<h1>Axios test</h1>
		<pre><code id="result">

		</code></pre>
	</div>
	<script>
		const run = async function() {
			// const children = await axios.get(
			// 	'/api/site/children',
			// 	{auth:{username: 'iam@adamkiss.com', password: 'asdasdasd'}}
			// );

			const newChild = await axios.post(
				'/api/site/children',
				{slug: 'axios-new', content: {title: 'Axios New'}},
				{auth:{username: 'iam@adamkiss.com', password: 'asdasdasd'}}
			)

			console.log(newChild);

			document.getElementById('result').textContent = JSON.stringify(children, null, 2);
		}
		run();
	</script>
<?php endslot() ?>

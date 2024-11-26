import { useEffect, useState } from '@wordpress/element';

const View = (props) => {
	const [posts, setPosts] = useState([]);
	const { postCount } = props.attributes;

	useEffect(() => {
		fetch(`/wordpress/wp-json/clp/v1/latest-posts?count=${postCount}`)
			.then((response) => response.json())
			.then((data) => {
				setPosts(data)
			});
	}, [postCount]);

	return (
		<div className="latest-posts-block">
			{posts.length > 0 ? (
				posts.map((post, index) => (
					<div key={index} className="latest-post">
						{post.featuredImg && <img src={post.featuredImg} alt={post.title} />}
						<h3>{post.title}</h3>
						<p>{post.excerpt}</p>
					</div>
				))
			) : (
				<p>No posts found</p>
			)}
		</div>
	);
};

export default View;

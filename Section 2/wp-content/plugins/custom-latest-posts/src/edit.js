import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';
import { useState, useEffect } from '@wordpress/element';

const Edit = ({ attributes, setAttributes }) => {
	const { postCount } = attributes;
	const [posts, setPosts] = useState([]);

	useEffect(() => {
		fetch(`/wordpress/wp-json/clp/v1/latest-posts?count=${postCount}`)
			.then((response) => response.json())
			.then((data) => {
				setPosts(data)
			});
	}, [postCount]);

	return (
		<>
			<InspectorControls>
				<PanelBody title="Settings">
					<RangeControl
						label="Number of Posts"
						value={postCount}
						onChange={(value) => setAttributes({ postCount: value })}
						min={1}
						max={10}
					/>
				</PanelBody>
			</InspectorControls>
			<div>
				{posts.map((post, index) => (
					<div key={index} className="latest-post">
						<img src={post.featuredImg} alt={post.title} />
						<h4>{post.title}</h4>
						<p>{post.excerpt}</p>
					</div>
				))}
			</div>
		</>
	);
};

export default Edit;

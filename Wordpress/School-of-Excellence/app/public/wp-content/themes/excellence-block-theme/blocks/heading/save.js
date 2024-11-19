import { RichText } from '@wordpress/block-editor';

export default function Save(props) {
    const { headingText, size } = props.attributes;

	return <RichText.Content 
                tagName="h2"
                className={`banner-${size}`}
                value={ headingText }
            />
}    
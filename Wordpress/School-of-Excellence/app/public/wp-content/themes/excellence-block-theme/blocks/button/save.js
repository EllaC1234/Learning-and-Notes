export default function Save(props) {
    const { text, linkObject, buttonColor, textColor } = props.attributes;

	return <a href={linkObject.url} className="btn-large" style={{ ...{ color: textColor }, ...{ backgroundColor: buttonColor } }} >{text}</a>                
}    
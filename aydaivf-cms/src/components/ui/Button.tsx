type Props = React.ButtonHTMLAttributes<HTMLButtonElement> & { asLinkHref?: string };
export default function Button({ asLinkHref, className = "", ...rest }: Props) {
    const base = "inline-flex items-center justify-center rounded px-4 h-10 text-sm font-medium border hover:opacity-90";
    if (asLinkHref) return <a href={asLinkHref} className={`${base} ${className}`} {...(rest as any)} />;
    return <button className={`${base} ${className}`} {...rest} />;
}

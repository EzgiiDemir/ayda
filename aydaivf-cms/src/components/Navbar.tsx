import NavbarClient from "./NavbarClient";
import { getMenu } from "@/lib/cms";
import { Locale } from "@/lib/cms";

export default async function Navbar({ locale }: { locale: Locale }) {
    const menu = await getMenu(locale);
    return <NavbarClient menu={menu} locale={locale} />;
}

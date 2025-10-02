import Prices from '@/components/ui/Prices';
import { getOurPrices } from '@/lib/cms';

type Props = { params: { locale: string } };

export default async function Page({ params }: Props) {
    const data = await getOurPrices(params.locale, 'our-prices');
    return <Prices data={data} />;
}
